from django import forms

class SubscribeForm(forms.Form):
    emailadr = forms.EmailField(label='Cc Email Address(es)', max_length=60)