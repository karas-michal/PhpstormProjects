package com.company;

/**
 * Created by karas on 12.01.2017.
 */
public class MyPublicKey {
    private long e;
    private long n;

    public MyPublicKey(long e, long n) {
        this.e = e;
        this.n = n;
    }

    public long encrypt(long x){
        return Main.modulo(x, e, n);
    }
}
