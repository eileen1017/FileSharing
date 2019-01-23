###Log in:
Username: admin   
Password: admin   
Friends: 1 and 3

###Files Description:

**FileSharing.html:** the html file for log in page, allow users to input their username and password.   
**FileSharing.html:** the php file for log in page, verify user's inputted username and password.   
**signup.html:** the html file for sign up page, allow users to input their username and password for register.   
**signup.php:** the php file for sign up page, verify user's input values is valid or not, see if there is duplicate usernanme.   
**addfriend.php:** the php file for add friend page, add a friend to friends.txt file which is under each user folder hidden from users.   
**delete.php:** the php file for delete file page, the user will enter the name of files to delete it.   
**listfile.php:** the php file for listing all the folders exits under the current user, except for the files hidden from users.    
**logout.php:** the php file for log out page. If the user log out, she or he will be logged out and cannot use backward button on browser to go back.   
**myhomepage.php:** the php file for user's home page. The user can add friend, view files, upload files, share files, delete files, view friends' files by clicking on specific buttons on this page.   
**share.php:** the php file for share a file, user can browser though local folder to share a file with his or her friends. So that his or her friends can view the usr's files.   
**showfile.php:** the php file for show the content of a file that is uploaded by the user.   
**showfolders.php:** the php file for showing the files inside user's specific folders.   
**upload.php:** the php file for users to upload a file to his or her own folders. The uploaded file cannot be viewed by the users' friends.   
**view.php:** the php file for users to view their friends' shared files. The files will be displayed only when the current user is under the inputted friend's friend list friends.txt file.    

###Creative Portion
1.	**sign up:** We have created a sign up page for new users to register.  
2.	**Add friends:** We have created a add friends button for users to add other users as friends. If User A is in User B's friend list, User A can view what are the shared files User B has uploaded by inputting friend's username and clicking on *View!*.  
3.	**Sharing files:** We have created a sharing file option for users to share files with their friend. Users can upload the files they want to share with friends by choosing any file and clicking on *Share!*. So that his or her friends can view the files if they wish to.  
4.	**File version management:** We have created a system to allow file version management. If User has already uploaded a file called **chair.png** and he wants to upload a file with same name **chair.png**, our system will track the filename and keep the 3 most recent versions of filename with **chair.png**. The newest uploaded file will be in myfiles folder, the second newest will be in myfiles_version1 folder. The oldest one will be in myfile_version2 folder. If the User uploaded four times or more, the oldest version will be automatically overwrite.  



###Future Work
Due to time spent, we have not settled a problem. When user A wants to view user B's shared files, User A is able to view the list of files in shared folders, but not opening it. We think the problem occurs due to session check, so in the future if possible, we will polish our functionalities. 
