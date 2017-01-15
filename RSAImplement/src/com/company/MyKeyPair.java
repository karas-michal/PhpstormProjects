package com.company;

/**
 * Created by karas on 12.01.2017.
 */
public class MyKeyPair {
    private MyPublicKey pub;
    private MyPrivateKey priv;

    public MyKeyPair(MyPublicKey pub, MyPrivateKey priv) {
        this.pub = pub;
        this.priv = priv;
    }

    public MyPublicKey getPub() {
        return pub;
    }

    public void setPub(MyPublicKey pub) {
        this.pub = pub;
    }

    public MyPrivateKey getPriv() {
        return priv;
    }

    public void setPriv(MyPrivateKey priv) {
        this.priv = priv;
    }
}
