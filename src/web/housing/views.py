# Create your views here.
from django.http import HttpResponse
from web.housing.models import *

import random



def listAvailableRooms(request,usrname,build):
  try:
    user = User.objects.get(username=usrname)
  except User.DoesNotExist:
    html = "<html><body>Could not find user!</body></html>"
  else:
    rooms = Room.objects.filter(building__name = build)
    
    html = "<html><body>List Rooms:<br />"
    for r in rooms:
      if(r.gender == 'A' or r.gender == user.gender):
        html += "<b> %s %s (%s people) (%s)</b><br />"%(build, r.number, r.totalPeople, r.gender)
      else:
        html += "%s %s (%s people) (%s)<br />"%(build, r.number, r.totalPeople, r.gender)
    html += "</body></html>"
  return HttpResponse(html)


###################
# These are testing methods that are generally useless:
###################
def addUser(request,name="NULL", lot=-1):
  if(lot<0):
    lot = random.randint(1,10000)
  u = User(
            username = name
          , gender = 'M' if(lot%2==0) else 'F' #Women are odd! Get it?!?!
          , year = -1
          , lottery = lot
          , isActive = True)
  u.save()
  html="<html><body>Created User %s</body></html>"%(name)
  return HttpResponse(html)

# Spawns a bunch of users
def populateRandomUsers(request):
  for i in range(1,1000):
    addUser(None, name=i, lot=i)
  html="<html><body>Created a sh*t ton of users</body></html>"
  return HttpResponse(html)

def populateBuildings(request):
  b = (
      Building(
           name="Blitman"
          ,address="123 Fake St"
          ,description="<description: Blitman>"
        ),
      Building(
           name="Nason"
          ,address="234 Fake St"
          ,description="<description: Nason>"
        ),
      Building(
           name="Quad"
          ,address="345 Fake St"
          ,description="<description: Quad>"
        )
    )
  for build in b:
    build.save()
  html="<html><body>Created some buildings</body></html>"
  return HttpResponse(html)

def addRoom(request,build,num):
  # Passed building must actually exist
  try:
    buildCheck = Building.objects.get(name=build)
  except Building.DoesNotExist:
    html="<html><body>Building \"%s\" was not found!</body></html>"%(build)
  else:
    if(int(num) % 3 == 0):
      gen = 'M'
    elif(int(num) % 3 == 1):
      gen = 'F'
    else:
      gen = 'A'
    r = Room(
            number=num
            , building=buildCheck
            , gender=gen
            , totalPeople=2 )
    r.save()
    html="<html><body>Created Room: %s %s ( %s )</body></html>"%(build, num, gen)
  return HttpResponse(html)

def populateRooms(request,build,num=50):
  for i in range(1,int(num)):
    addRoom(None,build,i+1000)
  html="<html><body>Created %s Rooms in %s</body></html>"%(num,build)
  return HttpResponse(html)
