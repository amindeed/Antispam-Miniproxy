
# Antispam Miniproxy

_For the time being, it is a project of newsletter subscription form template (typically for “Coming Soon” pages) trying to evolve into an an “anti-spam API proxy” implementation._

**Main obtjectives :**
- Exclusive/Forced use of HTTPS.
- Evaluating inbound domains and IP addresses: _checking HTTP headers (User Agent, HTTP referer…), DNS blacklist status, MX records…_
- Sanitizing and validating input data.
- CAPTCHA, double Opt-in
- Use `fail2ban` to manually block spammy IP addresses and hostnames for a specific time period.
- _Well, one can dare to borrow the content of Wikipedia's [“Anti-spam techniques”](https://en.wikipedia.org/wiki/Anti-spam_techniques) page as a [very] long-term TODO list..._

**Repository structure :**
- `backend`: PHP code to subscribe, check or remove email addresses from a MailChimp list using API.
- `frontend`: landing / 'coming soon' page sample code .
- `blacklist-check`: testing/draft code to check IP addresses or domains against popular public blacklists.
- `validate_email_addr`: basic frontend code to validate typed email address.

Check [`Worklog.md`](WorkLog.md) to learn more about project history and progress so far.
