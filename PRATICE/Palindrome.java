import java.util.Scanner;

public class Palindrome {

    public static int reverse(int x) {
        int ans = 0;
        while(x > 0) {
            int lastDigit = x % 10;
            ans = ans * 10 + lastDigit;
            x /= 10;
        }
        return ans;
    }

    public static boolean isPalindrome(int original ,int reverse) {
        if (original != reverse) return false;
        return true;
    }


    public static void main(String[] args) {
        try(Scanner sc = new Scanner(System.in)) {
       
            System.out.print("Enter X : ");
            int x = sc.nextInt();

            if (x < 0) {
                int toPositive = Math.abs(x);
                int reverse = reverse(toPositive);

                reverse *= -1;
                System.out.println(isPalindrome(x, reverse));
            }
            else {
                int original = x;
                int reverse = reverse(x);

                System.out.println(isPalindrome(original, reverse));

            }
        }
    }
}