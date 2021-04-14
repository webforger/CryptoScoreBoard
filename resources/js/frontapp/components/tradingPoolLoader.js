import React, { Component } from 'react'

const TradingPoolLoader = (props) => {

   if (props.loading) {
       return (
        <p>Loading</p>
       );
   } else {
       return (
           <div></div>
       )
   }
}

export default  TradingPoolLoader
