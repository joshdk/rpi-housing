from django.conf.urls.defaults import patterns, include, url
from web.views import *


from django.contrib import admin
admin.autodiscover()


urlpatterns = patterns('',
	url(r'^admin/',    include(admin.site.urls)),

	url(r'^api/',      include('web.api.urls')),
	url(r'^/?$',       'web.views.static',{'path':'statics/html/main.html'}),
	url(r'^(.*[^/])$', 'web.views.static'),
)
