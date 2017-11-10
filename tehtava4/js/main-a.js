'use strict';

const ekaP = document.querySelector('p');
const tokaP = document.querySelector('p:nth-child(2)');
const kolmasP = document.querySelector('p:nth-child(3)');
//const lisaa = document.querySelector('#lisaa')

//lisaa.addEventListener('click',(evt)=>{
//ekaP.classList.add('punainen');

//});


const changeClass = (evt)=>{
  ekaP.classList.add('punainen');
  


} 
   

document.getElementById("lisaa").addEventListener('click', changeClass);

const changeColour = (evt)=>{
  if(tokaP.classList.contains('sininen')){
    tokaP.classList.add('punainen');
    tokaP.classList.remove('sininen') 
  }
  else{
    tokaP.classList.add('sininen');
  }
  


} 
   

document.getElementById("vaihda").addEventListener('click', changeColour);

const toggleGreen = (evt)=>{
  if(kolmasP.classList.contains('vihrea')){
    kolmasP.classList.remove('vihrea');
  }
  
  else{
    kolmasP.classList.add('vihrea');
  }
  


} 
   

document.getElementById("toggle").addEventListener('click', toggleGreen);