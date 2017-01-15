package com.company;

/**
 * Created by karas on 12.01.2017.
 */
public class MyPrivateKey {
    private long d;
    private long n;

    public MyPrivateKey(long d, long n) {
        this.d = d;
        this.n = n;
    }

    public long decrypt(long x){
        return Main.modulo(x, d, n);
    }
}
