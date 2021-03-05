import json
from django.urls import reverse
from django.http import HttpResponse
from django.shortcuts import render, redirect
#from .form import SubscribeForm


def home(request):
    # session_messages = request.session.pop('messages', None)
    # user = request.session.get('user')
    # return render(request, 'index.html', context={'user': user, 'messages': session_messages})
    return render(request, 'index.html')


""" 
    def subscribe(request):
    # ...
    print('**************** A *****************')

    if request.method == 'POST' and request.headers.get('x-requested-with') == 'XMLHttpRequest':

        form = SubscribeForm(request.POST)
        print('**************** B *****************')

        if form.is_valid():
            print('**************** C *****************')
            parameters = [form.cleaned_data]
            print(form.cleaned_data)

            # ...[Check session and] build request body...

            try:
                print('**************** D *****************')
                # ...Make the request (MailChimp API call), get result data and check for errors...
                # response = ...
                # errors = response['...
                # data = response['...

                # Check for MailChimp API-level errors
                if 'error' in response:
                    print('**************** E (1) *****************')
                    # api_call_error = response['...
                    http_response_err_msg = 'MailChimp API call error: ' + str(api_call_error['errorMessage'])
                    return HttpResponse(http_response_err_msg, status=500, content_type="application/json")

                # When an empty response data is returned
                elif not s_data:
                    print('**************** F (1) *****************')
                    return HttpResponse("API call returned empty data object.", status=400, content_type="application/json")

                else:
                    print('**************** F (2) *****************')
                    return HttpResponse(json.dumps(script_function_return), content_type="application/json")
            
            # Check (handle) HTTP request-level errors
            except Exception as e:
                print('**************** G *****************')
                http_response_err_msg = 'MailChimpe API call error: ' + e.content
                return HttpResponse(http_response_err_msg, status=500, content_type="application/json")

        # Process invalid form data errors,
        # handled by Django Forms before calling the MailChimp API
        else:
            print('**************** H *****************')
            return HttpResponse(json.dumps(dict(form.errors)), status=422, content_type="application/json")
    
    # Redirect to home page if the HTTP request is not a valid AJAX form submit
    else:
        print('**************** I *****************')
        return redirect('/') 
"""

