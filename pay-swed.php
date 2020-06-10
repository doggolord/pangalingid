<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - Swedbank - Pangalink-net</title>
    </head>
    <body>
<?php
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);
$total = filter_input(INPUT_POST, 'total', FILTER_VALIDATE_FLOAT);

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2020 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
"-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAxpD6602BXv2VfFtwqoMW/YgkS/rF0VdDRomgjx+gnQKlyjUo
m6B+mBjWB6t2Wch9IqkCEQ+eLImYaYeUmqX0rtKgk6ol6NCOhMt1hCvl2d7+Ohez
vhi/TfimPa1OBEPqNlyjEU76ZmU1vtpuMOGY8/fFoKkubpA/hq4wKEWyjC4LO9i3
+AYku8SBnNZb4YMnKM5KKnGKE3NYO8pPQLnMfJm6z+YSOPVlrleRdXXbWMlwzKQs
Qpe5Z3xRQ/zFYNiVjZ1t/Zp+4dqVwpeHVqmkZvRUPR8DxI4k2gsBmOXlY/2+2ERc
82Sko6udMkcrK2JNlkYWhcaWI9yJdi0j7uWf4QIDAQABAoIBAEu392cJHB879egA
+nqbGIY/hw/OJecJLqdUTfyl49pbqxrroHuP/RZEykEMekoMcONprVcSLI/xPERp
pho+1Iph2UfV5zTbaq1q5HotPy4QocNHTIxd5X13JvV4A7sOpt5p/ujXxBaN26vW
oZRUQr4tqpf0S7dvnDngbI6+3TIko8wUiyapk39VPujAp7llPiPLHLo1yrSgM/KH
ur6xzh5jC2T2a/+XBIOPoPeUbFwx3UoPKYrKmieKJ8Qfc8+tDSZ4qUordO+0ro+T
DMl34mBjhhKG+PMjwh9SA4MuTIHrMETZbrw2PAzP94885S+pkIEIluUj9xxtVIBx
v0b3iX0CgYEA+ptavWxun0zm4+M+rVfGsXKi/WyokQrq0a70QI9xCNBSO6VfiIMb
iBbMIX0YzqokYcYQ4YUaAMMJ6fjuUThfZqzigLeiSLDRBEOm8vV7rUKeEti5Id8k
/leGbb1MVxDdXhVuPiCPRlSqqocO7SJIkdjhw4g6Lgdi78lHT8PVuMcCgYEAytbs
bxso8wAfshblf4oa88z/7tLsNkFtfJNVfw0aX2Kiv+/XYarrvWFAbX0zGi1TflWZ
zP/ZJY/id194Ss2Sgd3qQ+/IIxCeuVS4IhiBAzdpZWswZ8zry7V/04KViIuIBY0H
hQyJVkmNy3lw4rUVl9w8E9Si+JBOXMdqh0LzyhcCgYBOsxzy4at3wWm85S9YtnkC
XtLKrSXersQBZ2TzJVjFAM7iRlPTBgFOYoJmfeeddxcH0XCZsffxh06EuJT20rI7
B032SDThiQ2KvkgegnL9fS8xEfhJp87xRMFFky33JaevFSHSxtzXpF0YQmOwmpSZ
oLd9dTl4HP+398i6RvDGHwKBgA+51ADVMTqNwudSwR4/PdGzDhCdB7U5I1zqK1G7
WVUV15pb5O3si3RWSuFyOHkKFJQR3Oe42kQAQMWSgEgEYhxxcQ0tVO3rBvNFbzUt
gysVq7UyN0GE8K8NdkiWsjMw5i3P/kpBa5BmCXlCBA9/jJoGeB3teWkd/wVQbKDp
/u6nAoGAblOKddnACxdB21McUpT/F8dMAdnINhznWvuodw5cijcvM6PNkAr/pmAU
qTpjDxCrq2tYjpxo5jSbkPpR1DmVqYvaOcwLHbL8JK3tH5b/ojY0pmVsoOxx0bNC
wNnreeH5qxTGnsPzcEIXs4wsNoRs49VuEwa6v/gyKVE9uk6xe/E=
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100023",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => $total,
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE152200221234567897",
        "VK_NAME"        => $firstName .' ' . $lastName,
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "https://pangalingid.tak17poljakov.itmajakas.ee/payment-successful.php/?payment_action=success",
        "VK_CANCEL"      => "https://pangalingid.tak17poljakov.itmajakas.ee/payment-canceled.php/?payment_action=cancel",
        "VK_DATETIME"    => "2020-06-10T13:07:49+0300",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100023 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE152200221234567897 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* gaming */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/xjLriwq2TizqMavr?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/xjLriwq2TizqMavr?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-06-10T13:07:49+0300 */

/* $data = "0041011003008009uid10002300512345003150003EUR020EE152200221234567897006gaming0071234561011Torso Tiger069http://localhost:8080/project/xjLriwq2TizqMavr?payment_action=success068http://localhost:8080/project/xjLriwq2TizqMavr?payment_action=cancel0242020-06-10T13:07:49+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* oAMtjl0uIPmSY7PEkLK1NlHC4AIm3OT77x6K4BvcsClK6u9Kdyr2Ra1+iy4GxShPXYVE3JbIW2YeiX58r1IAEsZAeqhUwS2XNUxD6FgVVzTdlnDLHuLNOhti/mH+GEGD037jXYa2EpNUm3FSEy7X1BEpohNGSZD+uahSkKR9e/GtiDmlloZVsxAxKQ3ohi8/fyYLaCDMvjXaRYY0SwgWmXZ8GDPiu3E6T58FvJqC+hbGUz8K39mNLwQNt4/OmgrfRbTEMy2tsIRGeocgIVoQOS6g20Vdq1Gsk1y5IiPJpghbKwRgJLCym0MKaBAhFpNe/fSxXejNmsHO5gcGLj4JPQ== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
        <p>Makse teostamise näidisrakendus <strong>"swed"</strong></p>

        <form method="post" action="http://localhost:8080/banklink/swedbank-common">
            <!-- include all values as hidden form fields -->
<?php foreach($fields as $key => $val):?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
<?php endforeach; ?>

            <!-- draw table output for demo -->
            <table>
<?php foreach($fields as $key => $val):?>
                <tr>
                    <td><strong><code><?php echo $key; ?></code></strong></td>
                    <td><code><?php echo htmlspecialchars($val); ?></code></td>
                </tr>
<?php endforeach; ?>

                <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
                <tr><td colspan="2"><input type="submit" value="Edasi panga lehele" /></td></tr>
            </table>
        </form>

    </body>
</html>
