for(i=0;i<10;i++)
{
var thumbnail=document.createElement('img');  //made an element img
thumbnail.setAttribute('src', 'C:/Users/Salma/Desktop/New folder (2)/img/1.jpg'); //give the img
var title=document.createElement('h3');	//made an element of font h3 called title 
title.innerHTML ='lorem ipsum is dummy';	//in the h3 tag put 'lorem ipsum is dummy'
var description = document.createElement('p');	//made a paragraph element
description.innerHTML=`Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt
ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip
 ex ea commodo consequat.`;	//in the p tag put that text
thumbnail.classList.add("thumbnail");	//made class called img to style images
title.classList.add("title");	//made class called title to style titles
description.classList.add("desc");	//made class called desc to style descriptions
var content = document.createElement('div');	//made element div called content to contain the tsitle and description in like a box together
content.append(title,description);	//put title and description in the var contenet together
var box = document.createElement('div');	//made a div box to put image and the content(title & description in it)
var imagelink = document.createElement('a');	//made a link element 
imagelink.append(thumbnail);	//put the image in the like element to make it a linke image
imagelink.setAttribute('href','https://www.google.com');	//gave the image the link to go to
imagelink.classList.add('imagelink')	//gave image link a class for styling
var contentlink = document.createElement('a');	//same for image made for contenet 
contentlink.append(content)	//same for image made for contenet 
contentlink.classList.add('contentlink')	//same for image made for contenet 
contentlink.setAttribute('href','https://www.youtube.com/results?search_query=black+holes')	//same for image made for contenet 
box.classList.add("box");	//gave the box(image&content(Title&description)) class for styling
box.append(imagelink,contentlink);	//put the image and the contenet as linkes in the box
var container=document.getElementById('container')	//made element that is the main div in the html file with the id 'container'
container.append(box);	//put the box in the main div 'container'
}