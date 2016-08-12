
/**
 * This script uses Helium to send a message from one socialyte to another.
 * The script will also log into the reciever account to verify that the message
 * was sent.
 */

        import static com.heliumhq.API.*;
        import java.util.Scanner;
public class sendMessage {
    public static void main(String[] args) {
        
        goTo("https://mirage-shelter-3000.codio.io/User/HotspotLogin.html");

        String email = "deepblue32@yahoo.com";

        String password = "Hotspot1";
        write(email, into ("Email Address"));
        write(password, into("Password"));
        click("Login");
        click(Image("inbox"));
        click("+ new");
        String recipient = "deepgreen9";
        write(recipient, into("Add recipent..."));
        String message = "Test reply 3";
        write(message, into("Enter message..."));
        click("Send");

        click(Image("profile"));
        click("Sign out");

        String email2 = "deepgreen9@yahoo.com";
        String password2 = "Hotspot1";
        write(email2, into ("Email Address"));
        write(password2, into("Password"));
        click("Login");
        click(Image("inbox"));

        if (Text(message).exists())
            System.out.println("Test passed!");
        else
            System.out.println("Test failed :(");
        // killBrowser();
    }
}
