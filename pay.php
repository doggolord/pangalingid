<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - SEB - Pangalink-net</title>
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
MIIEogIBAAKCAQEAp63W1XREJCBT07n8dDbhtoYlkXICV69C9Blrb6w4yvfFrIJl
Q7nEjA8ojtvWGL0qtcKkHGH+NMLry0qTay7x+CA6ky04uF75s1+w550aZf+4Vwub
qCLntw6rymjRk0wboSzGT06bLYgvHngMCzaBAGm4qkL2NTreGIz5pawk56RYCfi9
hhjMhuRjgIfQiHP2SLv0sEPi5vG+RVtHq8OGEzMJ2sSdN2czbb1oSDG5dfM1V6Of
t/12ZqAl5a9JT+1Y+R0n76itEg7NeRDYjddgoTm80VxYClAtCZ5e59iO2W0gpjNf
BfEl2Oeu/XpNe6gqm5A5JhBxTKlP7Coh2kc4aQIDAQABAoIBADQDN5XE1/JA2N/f
XFEMSR2eJP8l11Yttl4TmIDucjt7eiTV2eWVNUOg3BrcVGAeJaZ19wQa3YiuQggw
XOQtjr9B+Al5SJPgWiJq92wRDoQ/O4Y8wo74LNpawa0qsH+5ZwSq5+Tn5DjOepc/
87RytrdTFAY0eTzvwr7o0/OxH01+60KengmF/xRvAxgRgoax9n1jmBJTAZDQ8r/s
12BJBBHQeWgX5mp67i4bhXTtvCvXXj8gqqgql6ByP6muDohCkj9OQjlC8qU81DSO
hgWPuQSdl35haAPUvfIFMbTAMhCpoYsmF5wwLVmHEpF/I43LYs0CXY82wbaVY/Fk
Mj1dgCUCgYEA3WQKw10PsWdMtou8E3KgH6p2cDNebCPRKEpuKO9XyrG6N/XjAr/B
N+d7q4Os+ZBcWQx7BZDkCqJqYU9n1QrowL5nUZMvmud1GzASK96r8YPfSrFJiAI4
SWyyyv4114rXdaPOs/531N455Fbdl/SHPLkpNLrVCqy6PSzqsHdzXcsCgYEAweRH
QJCsndG0XjmIWMfYryxK6f/2M4GMw44nhZr7XIvQmhNOpqpBMZKNGTTBlZpQp3+F
UDwdFozXQdlW7ZkCzNGQ9XWBXu4ZLkttvHZHRP/6po/v4AWDzM9w450MEfO7J4FI
iegOstEXi42x0Gbd07lcN9DKFCmY+11piGlKfBsCgYBOynf6J3iaToVCwmBhG35Z
RrV4IRANtIGPsU2bS/MWtEHuAJiWNeByIPQmimpZN0NmfcaaqIJANqVdlIEDlSpY
zmq+4X8jxhQrZORSsKDJB4HEd2wP95pIp2LKU8adu1ALEg1SidHj9GLuHOwoVGJ8
/fjoR0Xi0q5Fb2LnAtwQGQKBgC4gR48lm9sjs1wjJbuxN2xdBilq+kBAlqNDI0XW
m+vlWyf8Zd6ibEYFzklr0o3rmzptzOJMmsLtmJwSv2pg11iwlmK+pJtX22e3DBEk
tknE9/U+Etvhk/xacUnE58UxjZmVWRNtwGlr8sUBXYbtoeInm7evlRN83ecWzu9j
1RN3AoGAb7e2QAiYsaTrrI/k2LLRp7JO6+RFi8GFYLZ699ljhCCU1z7hExuyRqo8
Kvt7ua+0nVZLuRe9MP4kyn9rUy/uhFaUmbGM7XblU4OQPiHPNS3avMheXprE/GKM
hWb7DQLgS563D+2kW1bVUIXpMG4vKPBIEftOq6TGJuaOHD6K+HQ=
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100010",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => $total,
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE171010123456789017",
        "VK_NAME"        => $firstName .' ' . $lastName,
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "https://pangalingid.tak17poljakov.itmajakas.ee/payment-successful.php/?payment_action=success",
        "VK_CANCEL"      => "https://pangalingid.tak17poljakov.itmajakas.ee/payment-canceled.php/?payment_action=cancel",
        "VK_DATETIME"    => "2020-06-10T13:03:52+0300",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! SEB expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE171010123456789017 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* gaming */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/rbg17dZRlWKbKCJ6?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/rbg17dZRlWKbKCJ6?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-06-10T13:03:52+0300 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE171010123456789017006gaming0071234561011Torso Tiger069http://localhost:8080/project/rbg17dZRlWKbKCJ6?payment_action=success068http://localhost:8080/project/rbg17dZRlWKbKCJ6?payment_action=cancel0242020-06-10T13:03:52+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* GFTeEhNzIzGjM95qKmUPLJvDCSB5oBr1qKYPYvmmKyRIjQ5TyeV67zvVQZ6vNQ7XavwzveR/e4jNctHo3NjHL/WPpCvIzXtQeCosKxAmtfS8vrLQ1EFld0dQGsOy5yWfD8VWuuuYicSU+lJUsK4eQvLd7X7NxJkW1hNxYiSFPAtFmrg3i9HwLKoCH5sgcN2+R36NnoAtFvIL1bpP5+doSWWl8KJHCJTXs/jv8cB7/CmBWGVUFb9JQvfM5P43ToqfTpUijbmkz0dMHg0jW1UjjQ+EV5dqaCNu7MKC5Lxm29maVN37cB+1dO0gbbbOjYFhpl8DVocYMB/ykBaLtJPKhw== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
        <p>Makse teostamise näidisrakendus <strong>"vahet ei ole vist jah"</strong></p>

        <form method="post" action="http://localhost:8080/banklink/seb-common">
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
