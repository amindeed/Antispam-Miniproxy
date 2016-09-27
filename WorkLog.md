
# WorkLog

## <u>2016-01-09 :</u>

I've been adapting [`MailChimp-API-v3.0-PHP-cURL-example`](https://github.com/actuallymentor/MailChimp-API-v3.0-PHP-cURL-example) code (`mc-API-connector.php`) since mid-december 2015:
- Using [phpdotenv](https://github.com/vlucas/phpdotenv) to keep secrets out of the repository.
- Commented out code of the functions: `mc_changename()`, `mc_reminterest()`, `mc_addinterest()`.
- Created basic HTML form for tests; turning debugs on.
- Code worked pretty well for `subscribe` and `checklist` actions. I've been testing some crazy edge cases :

_▶ Check email «correct_address@correct-domain.com» in list “Amindeed” :_

```
Address added @10:03

*Robot voice* : Bleep bleep. Debugging is on master.

string '{"id":"60955a1aba04b7ed54b32156d7c279cc","email_address":"correct_address@correct-domain.com","unique_email_id":"c4c3cd4990","email_type":"html","status":"pending","merge_fields":{},"stats":{"avg_open_rate":0,"avg_click_rate":0},"ip_signup":"41.251.115.176","timestamp_signup":"2015-12-31 08:06:16","ip_opt":"","timestamp_opt":"","member_rating":2,"last_changed":"2015-12-31 08:06:17","language":"en","vip":false,"email_client":"","location":{"latitude":0,"longitude":0,"gmtoff":0,"dstoff":0,"country_code":"","timezone":""},'... (length=2307)

pending
```


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

_`amine@£` :_

```
*Robot voice* : Bleep bleep. Debugging is on master.

*Robot voice* : Starting subscribe

string '{"type":"http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/","title":"Invalid Resource","status":400,"detail":"The resource submitted could not be validated. For field-specific details, see the 'errors' array.","instance":"","errors":[{"field":"","message":"Schema describes object, NULL found instead"}]}' (length=332)

*Creepy etheral voice* : Mailchimp executed subscribe
```

## <u>2016-01-24 :</u>

Been refactoring `mc-API-connector.php` :
- Backend code now is in the file `subscribe.php`
- Hardcoded functions calls debugging (temporarly) : Removed `debug` flag and code. `curl` outputs and API calls responses are now all logged to an external file `CurlDebugLog.txt` on each function call.
- Added code to verify target MailChimp host SSL certificate using [Mozilla CA bundle](https://github.com/bagder/ca-bundle) (instead of ignoring, as in the original code).
- For testing purposes: No Switch/Case statements upon the submitted value of the `action` POST parameter. Functions are manually commented in and out depending on the action (`subscribe`, `checklist` or `unsubscribe`) needed.


## <u>2016-01-26 :</u>

Testing some basic frontend email address validation code : https://jsbin.com/ozeyag/19/edit?html,js,output


## <u>2016-09-21 :</u>

Downloaded a copy of **[Creative Tim](http://www.creative-tim.com/product/coming-sssoon-page)**'s **"Coming Sssoon-Page"** [source code](https://github.com/timcreative/coming-sssoon-page). Stripped all non needed code and components.


## <u>2016-09-24 :</u>

Been customizing Creative Tim's "Coming Sssoon Page" to create a basic responsive "Coming Soon" page as a frontend.


## <u>2016-09-27 :</u>

Further customizations : removed page's header and footer, and a couple of other CSS tweaks.
