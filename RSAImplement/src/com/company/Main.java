package com.company;
import org.apache.commons.math3.primes.Primes;

import java.math.BigInteger;
import java.util.ArrayList;
import java.util.Random;

import static java.lang.Math.min;
import static java.math.BigInteger.ZERO;

public class Main {

    static long modulo(long a, long b, long n){
        long x=1,y=a;
        while(b > 0){
            if(b%2 == 1){
                x=(x*y)%n;
            }
            y = (y*y)%n; // squaring the base
            b /= 2;
        }
        return x%n;
    }

    private static Random randomGenerator;

    private static ArrayList<Long> getPrimeNumbers(long start, long stop){
        if (start >= stop)
            return null;
        ArrayList<Long> primes = new ArrayList<>();
        BigInteger temp = new BigInteger(String.valueOf(start));
        System.out.println(temp);
        long next_prime = temp.nextProbablePrime().longValue(); //Primes.nextPrime((int) start);
        while(next_prime < stop){
            primes.add(next_prime);
            next_prime = Primes.nextPrime((int) next_prime+1);
        }
        return primes;
    }

    private static boolean areRelativelyPrimes(long a, long b){
        for (long i = 2; i < min(a,b); i++) {
            if (a%i==0 && b%i==0){
                return false;
            }
        }
        return true;
    }

    private static MyKeyPair makeKeyPair(int length) throws Exception {
        if (length<8){
            throw new Exception("length less than 8");
        }
        long n_min = (long) 1 << (length-1);
        long n_max = (long) (1 << length) - 1;

        long start = (long) 1 << (length/2-1);
        System.out.println(n_max);
        long stop = 1 << (length/2+1);
        ArrayList<Long> primes = getPrimeNumbers(start, stop);
        long p = 0;
        long q = -1;
        while(primes.size()>0){
            p = primes.get(randomGenerator.nextInt(primes.size()));
            primes.remove(primes.indexOf(p));
            ArrayList<Long> q_candidates = new ArrayList<>();
            long finalP = p;
            primes.forEach(e -> {
                if (n_min <= finalP *e && finalP *e <= n_max){
                    q_candidates.add(e);
                }
            });
            if (q_candidates.size()>0){
                q = q_candidates.get(randomGenerator.nextInt(q_candidates.size()));
                break;
            }
        }
        if (q==-1){
            throw new Exception("can't find p and q for key of this length");
        }

        stop = (p-1)*(q-1);
        long e = -1;
        for (long i = 3; i < stop; i=i+2) {
            if (areRelativelyPrimes(i, stop)){
                e = i;
                break;
            }
        }
        if (e == -1){
            throw new Exception("can't find e");
        }
        long d = -1;
        for (long i = 3; i < stop; i=i+2) {
            if (i*e%stop == 1){
                d = i;
                break;
            }
        }
        if (d == -1){
            throw new Exception("can't find d");
        }
        return new MyKeyPair(new MyPublicKey(e, p*q), new MyPrivateKey(d, p*q));
    }


    public static void main(String[] args) {
        randomGenerator = new Random();
        try {
            MyKeyPair keys = makeKeyPair(128);
            long m = 13;
            long k = keys.getPub().encrypt(m);
            long m2 = keys.getPriv().decrypt(k);
            System.out.println(m2);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
