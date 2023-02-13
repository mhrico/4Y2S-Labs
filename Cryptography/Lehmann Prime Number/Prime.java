import java.util.Random;
import java.util.Scanner;

public class Prime{

    public boolean lehmann(int n){
        Random randomNumberGenerator = new Random();

        int random = randomNumberGenerator.nextInt(n);
        
        float e = (n - 1) / 2;
        return false;
    }
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        int n = scanner.nextInt();

        if(n == 2){
            System.out.println(n + " is prime");
        }

        else if(n % 2 == 0){
            System.out.println(n + " is not prime");
        }

        else{
            System.out.println("TODO");
        }

        scanner.close();
    }
}