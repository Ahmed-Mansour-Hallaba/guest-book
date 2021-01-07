# Guestbook
---
1st commit (Creating database and linking)
1. Created two tables one for users and one for messages
1. Users has id,email,password,Fullname
1. Messages has id,content,from_id(user),to_id(user),main_id(message)
1. Choosed to make self relation with messages so I can reach replies from same table
---
2nd commit (Adding Login)
1. Created html login page using Bootsrap
1. Created check_login function so it will be easier to call in php file
1. Created PHP script for login contacting database to check if post data is authorized so set user data into session
1. Created html file to view messages so I can include it in any page
---
3rd commit (Adding MasterPage)
1. Created header and footer php files so I can include them as masterpage
1. Header file contain condition that user data must be set in session otherwise
will return to login page
---
4th commit(Adding Logout)
1. Adding logout button to header
1. Adding logout php script to clear session and return user to login page
---
5th commit(Adding registration)
1. Created html registration page using Bootsrap
1. Created register procedure so it will be easier to call in php file and check if email already exists
1. Created PHP script for registration contacting database calling regiter procedure with given post data
---
6th commit(Adding MD5 security)
1. Added MD5 function to login and register to user password
so it will be more secured
---
7th commit(Fixing SQL injection bug)
1. Added `mysqli_real_escape_string` method to Post data to avoid SQL injection
---
8th commit(Adding send message)
1. Created message page and linked it with header
1. Created send_message php script to insert posted data into database
---
9th commit(Adding inbox and reply)
1. Created inbox page and linked it with header
1. Created reply page linked it with each message in inbox
1. Edited send_message php script so it can be used in sending and replying to messages
1. Edited database added timestamp to message so user can see it in inbox
---
10th commit(Adding sent message page and delete function)
1. Created sent page and linked it with header
1. Edited database made self relation in messages `ON DELETE SET NULL` so you can deleted replying message
1. Added delete_message php script which check for user authorization then delete message **If not user who sent the message will return an error**
----
11th commit(Adding edit message)
1. Added edit message page linked it with sent messages
1. Added authorization rule to page **If not user who sent the message will return an error**
1. Added update_message php script which update message content in database
---
12th commit(Adding diffForHuman)
1. Adding `diffForHuman` function which represent date in Inbox and Sent which shows date differnce between message creation date and now for humans eg. 10 minutes ago , not 1/7/2021 9.10.0
1. Added in seperate js file so code will be cleaner
1. Can use it in any span containing only date by adding `diff` class
---
13th commit(fix bugs)
1. Added `max-length=255` to message content
2. Edited database set maximum message content to 255
3. Edited message presentation in Inbox and Sent to be better for user
4. Ordered messages from most recent one
5. Fixed login UI 
6. Fixed Registration UI
7. Added Authorization to reply message for user to got the message
---
14th commit(Adding message history in reply)
1. Added `message_history` procedure to database getting message history using **Recursive CTE**
2. Adding it in top of reply page

---
## Ask a question?

If you have any query please contact at am00767@gmail.com
