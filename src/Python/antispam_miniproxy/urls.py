from django.urls import path
from antispam_miniproxy import views
from django.conf.urls.static import static
#from django.contrib.staticfiles.urls import staticfiles_urlpatterns
from django.conf import settings

urlpatterns = [
    path('', views.home),
    #path('subscribe/', views.subscribe),
]

#urlpatterns += staticfiles_urlpatterns()
urlpatterns += static(settings.STATIC_URL)
