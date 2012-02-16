from web.housing.models import *
from django.contrib import admin

class BuildingAdmin(admin.ModelAdmin):
  list_display = ['name']

class RoomAdmin(admin.ModelAdmin):
  list_display = ['building','number','isActive']

class UserAdmin(admin.ModelAdmin):
  list_display = ['username','isActive']

class QueueAdmin(admin.ModelAdmin):
  list_display = ['userMain','room','rank']

class InvitationAdmin(admin.ModelAdmin):
  list_display = ['inviter','dateCreated']

admin.site.register(Building,BuildingAdmin)
admin.site.register(Room,RoomAdmin)
admin.site.register(User,UserAdmin)
admin.site.register(Queue,QueueAdmin)
admin.site.register(Invitation,InvitationAdmin)

