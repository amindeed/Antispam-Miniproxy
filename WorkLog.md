
# WorkLog

## 2021-03-05

- Restructured the repository:
    - Added separate directory for Python/Django code.
    - Put all old code under `src/PHP/` _(to be archived)_.
    - Initiated a Django app.

## 2016-12-26 :

- Added random notes exported from Evernote; been collected and summarized since 05-Oct-16.

## 2016-10-23 :

- Backend : IP/Domain blacklist check draft/testing code :
	- Documenting about IP address and domain blacklisting in the context of web form submission and newsletter subscription. Established a list of most popular and reputable public blacklists to check against. In a not particular order :
        - Spamhaus ZEN
        - Spamhaus DBL
        - Barracuda BRBL
        - SpamCop SCB
        - URIBL IP
        - URIBL Domains
        - HoneyPot HTTP:BL
        - Backscatterer.org
	- Two sample source codes : using both PHP [dns_get_record](https://www.php.net/manual/en/function.dns-get-record.php) native function and [Net_DNS2](https://pear.php.net/package/Net_DNS2) PHP resolver library.
- Frontend :
    - No separate CSS file for bxslider; styles merged into 'coming-sssoon.css'.
    - removed draft and non needed code.
    - Added other "V5 Prophit" font formats for broader compatibility.
    - Page responsiveness seems to have been a little bit messed up since 2016-09-30 commit.

## 2016-09-30 :

- Used jQuery bxSlider to add vertically sliding titles of upcoming blog posts.
- Cleaned CSS files using [Dust-Me Selectors](https://addons.mozilla.org/en-US/firefox/addon/dust-me-selectors/) FireFox Addon.
- Overall tweaks and customizations.

## 2016-09-27 :

Further customizations : removed page's header and footer, and a couple of other CSS tweaks.

## 2016-09-24 :

Been customizing Creative Tim's "Coming Sssoon Page" to create a basic responsive "Coming Soon" page as a frontend.

## 2016-09-21 :

Downloaded a copy of **[Creative Tim](http://www.creative-tim.com/product/coming-sssoon-page)**'s **"Coming Sssoon-Page"** [source code](https://github.com/timcreative/coming-sssoon-page). Stripped all non needed code and components.

## 2016-01-26 :

Testing some basic frontend email address validation code : https://jsbin.com/ozeyag/19/edit?html,js,output

## 2016-01-24 :

Been refactoring `mc-API-connector.php` :
- Backend code now is in the file `subscribe.php`
- Hardcoded functions calls debugging (temporarly) : Removed `debug` flag and code. `curl` outputs and API calls responses are now all logged to an external file `CurlDebugLog.txt` on each function call.
- Added code to verify target MailChimp host SSL certificate using [Mozilla CA bundle](https://github.com/bagder/ca-bundle) (instead of ignoring, as in the original code).
- For testing purposes: No Switch/Case statements upon the submitted value of the `action` POST parameter. Functions are manually commented in and out depending on the action (`subscribe`, `checklist` or `unsubscribe`) needed.

## 2016-01-09 :

I've been adapting [`MailChimp-API-v3.0-PHP-cURL-example`](https://github.com/actuallymentor/MailChimp-API-v3.0-PHP-cURL-example) code (`mc-API-connector.php`) since mid-december 2015:
- Using [phpdotenv](https://github.com/vlucas/phpdotenv) to keep secrets out of the repository.
- Commented out code of the functions: `mc_changename()`, `mc_reminterest()`, `mc_addinterest()`.
- Created basic HTML form for tests; turning debugs on.
- Code worked pretty well for `subscribe` and `checklist` actions. I've been testing some crazy edge cases :


_▶ Check email «correct_address@correct-domain.com» in list “Amindeed” :_

```
*Robot voice* : Bleep bleep. Debugging is on master.

string '{"id":"91493d910a261fd484b4d173b9b3331c","email_address":"correct_address@correct-domain.com","unique_email_id":"e840225b6b","email_type":"html","status":"subscribed","merge_fields":{},"stats":{"avg_open_rate":0,"avg_click_rate":0},"ip_signup":"","timestamp_signup":"","ip_opt":"41.141.176.31","timestamp_opt":"2016-01-01 09:37:25","member_rating":2,"last_changed":"2016-01-01 09:37:25","language":"","vip":false,"email_client":"","location":{"latitude":0,"longitude":0,"gmtoff":0,"dstoff":0,"country_code":"","timezone":"'... (length=2310)

subscribed
```


_▶ Check if “invalid email address” exist in “Amindeed” (or in unexisting list, using a wrong or blank list ID) :_

```
address@@gmail.com

*Robot voice* : Bleep bleep. Debugging is on master.

string '{"type":"http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Resource Not Found","status":404,"detail":"The requested resource could not be found.","instance":""}' (length=198)

404
```


_▶ Trying to subscribe wrong email addresses to an existing list (“Amindeed”) :_

```
*Robot voice* : Bleep bleep. Debugging is on master.

*Robot voice* : Starting subscribe

string '{"type":"http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Invalid Resource","status":400,"detail":"An email address must contain a single @","instance":""}' (length=194)

*Creepy etheral voice* : Mailchimp executed subscribe
```

```
*Robot voice* : Bleep bleep. Debugging is on master.

*Robot voice* : Starting subscribe

string '{"type":"http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Invalid Resource","status":400,"detail":"The domain portion of the email address is invalid (the portion after the @: ghg)","instance":""}' (length=235)

*Creepy etheral voice* : Mailchimp executed subscribe
```

```
*Robot voice* : Bleep bleep. Debugging is on master.

*Robot voice* : Starting subscribe

string '{"type":"http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Invalid Resource","status":400,"detail":"The username portion of the email address is invalid (the portion before the @: )","instance":""}' (length=235)

*Creepy etheral voice* : Mailchimp executed subscribe
```

_`amine@**/>£` :_

```
*Robot voice* : Bleep bleep. Debugging is on master.

*Robot voice* : Starting subscribe

string '{"type":"http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Invalid Resource","status":400,"detail":"The resource submitted could not be validated. For field-specific details, see the 'errors' array.","instance":"","errors":[{"field":"","message":"Schema describes object, NULL found instead"}]}' (length=332)

*Creepy etheral voice* : Mailchimp executed subscribe
```
