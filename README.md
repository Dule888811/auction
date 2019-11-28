<p>
  						Application structure

<p>The app allows to users to offer their items at auction sale as well as to buy items placed by other users.
Each user can offer an unlimited number of items,while one item can only be offered by one user.
The user can also make an offer  for buying any item  while auction is still open for that item and one offer for buying can be associate to only one user.
Name, description, starting price, payment method and delivery method are saved for each item.</>>

					Users of the application

<p>There are two basic types of application users, registered users and unregistered users.
Unregistered users can search items by different criteria but cannot make offer for buying auction item.
The application does not save any data about unregistered users.
To be able to make offer for buying items, a user must first register.
When registering, the user must enter his first name, last name, email and password.
Email uniquely identifies the user.
Registered users access their account by entering email and password.
After successfully access the account, all users can:
Modify each of the data they entered during registration,
search items by different criteria,
They review a list of items they have previously bought and sold,
offer new item in the auction,
make offer new price for buying auctioned items.</p>

					Offer item on  auction

<p>When offering an item the user must enter the name, description,delivery method and starting price. 
The user can also enter a photo of the item.
At the moment when the user enters all the necessary data for the offer of the item,
the application automatically saves the date and time of the offer, 
as well as the date and time of the offer expires (+10 days).
From that moment the item was put up for auction,and all registered users can make offer for buying that item.
At the time of auction expiration, users can no longer make offer for buying that item, and user who made offer with the best price bought the item.
From the moment when auction starts,user who starts it can no longer to change data but he can cancel it.
User can see all offers from other users for item he sells at any time,and after auction expired application have to show winning offer.</p>


					Offer price for buying item on auction

<p>Any registered user can offer price for buying any item whose auction have not expired.
One offer for buying item can associate to only one user.
When submitting an offer user enter the price for buying item that have to be bigger then starting price of the item, the application must automatically save the date and time of makeing an offer.
After the auction expires,users can no longer make offers adn user who made the best offer bought the item.
After submitting an offer price for buying item, the user can no longer change the offer, but can cancel it.
After the auction expires, users can no longer cancel the offer.</p>


Technologies: PHP, HTML5 and very basic CSS3.


I used  singleton pattern for connections.
</p>
