import React, { Component } from 'react';
import Button from "./button";
import {useParams} from "react-router-dom";

const TradingPoolPage = (props) => {
    let { id } = useParams();
    return (
        <div id={"container"}>
            <div className={"container-right"}>
                <header className={"main-header"}>
                </header>
            </div>
            <div className={"container-left px-3"}>
                <header className={"main-header"}>
                    <div className={"row"}>
                        <div className={"col-lg-6"}></div>
                        <div className={"col-lg-6 align-right"}>
                            <Button
                                href={"/trade"}
                                style={"btn-secondary"}
                                text={"START TRADING NOW"}
                            />
                        </div>
                    </div>
                </header>
                <h1>{id}</h1>
            </div>
        </div>
    );

}

export default  TradingPoolPage
