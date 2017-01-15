package com.company;

import java.math.BigInteger;
import java.security.SecureRandom;

/**
 * Simple RSA public key encryption algorithm implementation.
 * <P>
 * Taken from "Paj's" website:
 * <TT>http://pajhome.org.uk/crypt/rsa/implementation.html</TT>
 * <P>
 * Adapted by David Brodrick
*/
public class main2 {
    /**
     * Trivial test program.
     */
    public static void main(String[] args) {
        RSA rsa = new RSA(1024);

        String text1 = "Yellow and Black Border Collies";
        System.out.println("Plaintext: " + text1);
        BigInteger plaintext = new BigInteger(text1.getBytes());

        BigInteger ciphertext = rsa.encrypt(plaintext);
        //System.out.println("Ciphertext: " + ciphertext);
        plaintext = rsa.decrypt(ciphertext);
        String text2 = new String(plaintext.toByteArray());
        System.out.println("Plaintext: " + text2);
    }

}