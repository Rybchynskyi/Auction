# Charity auction for helping the armed forces of Ukraine

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

Platform:<br>
[bid.all4ukraine.org](https://www.bid.all4ukraine.org/)

## For deploying:
1. Download the project
2. Import [database.sql](https://github.com/Rybchynskyi/auction/blob/master/database.sql) into your local database
3. Run server with PHP >=7.1 

## About the project
Previously, the volunteer organization conducted auctions manually, in social networks. It was inconvenient, confusing for users and not very effective.

<table border="0">
 <tr>
    <td width="600">
      <p align="center">
        <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/Auction/fullPage.png">
      </p>
    </td>
    <td>
      The main business-purpose of this platform is simple raising bids for a product fo users around the world. It must be with simple user-interface, without registration, but with the possibility for making offers for the bids and receiving the participant's contact information.<br>
      <br>
      Bets can only be accepted while the timer is running. New bet must be higher than the previous one.
    </td>
 </tr>
</table>
<br>
For easier placing new bets without registration - user data is stored in cookies while user had made his first bet. When user will make new bet - user data are added to input fields from cookies:
<p align="center">
  <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/Auction/popup.png" width="600">
</p>
<br>
The website provides authentication only for volunteers. If the volunteer enters his login and password, he will be able to visit the page with a list of all bets and contact details of the participants:
 <p align="center">
   <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/Auction/adminPanel.png" width="800">
 </p>
<br>
On this page it is possible to change the exchange rate.<br>
This is necessary because ukrainian currency hryvnia can be understendible for users. Thats why I developed the functionality for accepting both currencies: in hryvnias (for Ukrainian users) and in dollars (for foreigners).<br>
This gives us the opportunity to conducting auctions all over the world and raise funds for the needs of the armed forces of Ukraine 💪💙💛
