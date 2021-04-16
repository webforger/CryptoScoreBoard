import React, { Component } from 'react'

const TradingPoolLoader = (props) => {
    return (
       <div className={"trading-pool loading"}>
           <div className={"top"}>
               <div className={"text-line"}></div>
               <div className={"text-line"}></div>
               <div className={"text-line"}></div>
               <div className={"text-line"}></div>
           </div>
           <div className={"bottom"}>
               <div className={"text-line"}></div>
           </div>
       </div>
   );
}

export default  TradingPoolLoader
