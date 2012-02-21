from django.conf.urls.defaults import patterns, include, url
from web.api.views import *


urlpatterns = patterns('',
	url(r'^$',main),
)
