
# Minimalist Secure Form

Minimalist form webapp with a focus on security and spambots prevention.

**Main obtjectives :**
- Static site, along with a backend for non-Javascript fallback.
- Exclusive/Forced use of HTTPS.
- Evaluating inbound domains and IP addresses: checking HTTP headers (User Agent, HTTP referer…), DNS blacklist status, MX records…
- Sanitizing and validating input data.
- Hidden fields, CAPTCHA, double Opt-in, interfacing with Fail2ban…
- More to come...

**Repository structure :**
- `backend`: PHP code to subscribe, check or remove email addresses from a MailChimp list using API.
- `frontend`: landing / 'coming soon' page sample code .
- `blacklist-check`: testing/draft code to check IP addresses or domains against popular public blacklists.
- `validate_email_addr`: basic frontend code to validate typed email address.

Check [`Worklog.md`](WorkLog.md) to learn more about project history and progress so far.
