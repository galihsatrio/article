import java.util.Scanner;
public class Main {
    public static void main(String[] args) {
        System.out.println("----- Masukkan Angka ----");
        double[] angka = new double[10];
        //memasukan angka
        for (int i = 0; i < 10; i=i+1) {
            System.out.print("Angka [" + (i+1) + "] : ");
            angka[i] = new Scanner(System.in).nextDouble();
        }
        //mengurutkan
        for (int i = 0; i < 9; i++) {
            for (int j = 0; j < 9 - i; j++) {
                if (angka[j] > angka[j + 1]) {
                    double n = angka[j];
                    angka[j] = angka[j + 1];
                    angka[j + 1] = n;
                }
            }
        }
        System.out.println("Cek Median : [" +angka[0]+", "+angka[1]+", "+angka[2]+", "+angka[3]+", "+angka[4]+", "+angka[5]+", "+angka[6]+", "+angka[7]+", "+angka[8]+", "+angka[9]+"] ");
        double median = (angka[4]+angka[5])/2;
        System.out.println("Median dari array tersebut adalah " + median);
    }
}