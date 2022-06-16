from django import forms

class SubscribeForm(forms.Form):
    emailadr = forms.EmailField(label='Email Address', max_length=60)