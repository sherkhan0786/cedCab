# cedCab
Create a Web Application using PHP, MySql, HTML, CSS &amp; JS (PHP OOP's concept) 

User Group 1(Customer)- 
1- Can signup / login 
2- Can Book Taxi 
3- Can check previous ride with proper date &amp; price &amp; Other information 
4. Can check how much he spent on cab  &amp; total rides covered 
5. Can filter data like month wise , week wise, CabWise 
6. Can sort data(by ride date , by fare)(Asc, Desc Both) 
7. Only unblocked user can login 
8. Can update personal information like mobile number, Password, Name, username can't change 

Group 2 (Admin)   
1. Can check new ride request  
2. Can approve and cancel request 
3. Can see Detailed information of rides 
4. Can block &amp; unblock user 
5. Can check total earnings &amp; total no. of rides. 
6.  Can filter data like month wise , week wise, CabWise &amp; Can sort data(by ride date , by fare)(Asc, Desc Both) 
7. There will be default account with login id password for admin 
8. Can view, add location &amp; distance from charbagh , can edit, delete the available route   

Note:- Maintain Session, Cookies (for back to user like facebook)   

Schema -
------------------ tbl_user ----------------- 
user_id int PK AI,
email_id unique name varchar, 
dateofsignup varchar / datetime, 
mobile varchar, 
status boolean,   // 0 for blocked 1 for unblocked 
password varchar md5(), 
is_admin Boolean ------------------   
default user :-  username- admin@gmail.com , 
password- Password123$    


tbl_ride -------------- 
ride_id int PK AI, 
ride_date date, from varchar, 
to varchar, total_distance varchar,
luggage varchar, total_fare varchar, 
status int,  // 1 for pending , 
2 for complete &amp; 0 for cancelled  customer_user_id varchar FK,

---------------  tbl_location ---------------  
id int PK AI, name varchar, distance varchar, is_available boolean  ---------------  

Note: - Customer will have two area: Front-end for cab booking backend for data interpretation &amp; login page is common for admin &amp; user admin will have only backend area   Can book cab only after signing in. Anonymous user can't book Cab but can calculate fare. For booking user must login!
