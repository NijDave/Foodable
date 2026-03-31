//Write a program to convert rupees to dollar. 80 rupees = 1 dollar.

import java.util.Scanner;
public class Practical3 {
    public static void main(String[] args) {

		float rupees;
		Scanner in = new Scanner(System.in);
		System.out.println("Enter rupees:");
		rupees = in.nextLong();
		float dollars = rupees / 80;
		System.out.println(rupees + " Rupees is equal to " + dollars + " Dollars");
	}
    
}