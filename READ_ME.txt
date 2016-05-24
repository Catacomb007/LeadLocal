-----------------------------------------------------------------
 I N F O
-----------------------------------------------------------------

/////D E V   B U I L D/I N P U T S   U N S A N I T I Z E D///////////////////////
Written by 
	Andrew Hampson		A00954302
	Responsible for 
		Back-End design, implementation and testing
		Database design, implementation, connection
		Team management and project management
	
	
	Zach Yu				A00932303
	Responsible for 
		
		Front-End design, implementation and testing
		CSS responsive design and implementation
		Login authorization, Profile, Profile editor, Task, Task editor
		Images

	Frank Huang  		A00855040
	Responsible for 
        Document writing,user stories and personas， user testing，conducting
        survey, html page design, contact page,taskdetail
        and taskedit page, css modifying
                        
		

		
Project status: 80% Complete

KNOWN ISSUES
	Applyer function didn’t finish yer.
	The edit function can’t handle the empty string
	The edit confirm password didn’t work yet.
	The payment function didn’t finish.
	Didn’t finish the “meet check” function.
	Detail box in task create breaks when given quotes
	Direct links cause pages to load twice (I know exactly what's causing it,
		it's just the only way I got it to work.)
-----------------------------------------------------------------
 S E T U P
-----------------------------------------------------------------
Run the DBSetup.SQL file in your MySQL console.

THE DEFAULT DATABASE IS:

$db_server = "localhost";
$db_name = "kodiak";
$db_user = "root";
$db_passwd = "1234";

There are no default logins. Accounts must be created before loging in.
Otherwise, go nuts.
-----------------------------------------------------------------
 N E X T   S T E P S . . .
-----------------------------------------------------------------
Andrew:
We're only kinda done, if you squint. There are a small number of functions that need to be included
 before we can say that it's truly "production ready". First off: Input sanitisation. There's 
 very little preventing an SQL injection besides htmlentities(). I was also planning on 
 switching us over to paramaterised queries, but that didn't pan out. Next, we're still 
 missing some functionality, specifically ensuring payment. The PREV arrow in TaskCreate 
 still doesn't save your data, as shown in User test... 6? 7? One of those. Anyway. 
 On a positive note... WOOHOO FOR GITHUB YEAH!!! I don't have to spend hours collecting 
 runaway files!! See you guy's in september!

Zach: 
I face a lot problems when we merge files in the google drive. The version of code is 
hard to set up and trance. After Andrew pushed us to use github, the situation get better.
The registration and login function are the one of issue of our group. We are too late to 
complete this two important functions, and it make others work also stock.

Frank:

