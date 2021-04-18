import React, { Component } from 'react'
import 'react-vis/dist/style.css';
import {XYPlot, LineSeries, makeVisFlexible, GradientDefs} from 'react-vis';

const HomeHeader = (props) => {
    const FlexXYPlot=makeVisFlexible(XYPlot)

    const dataGoldPink = [
        {x: 0, y: 8},
        {x: 1, y: 5},
        {x: 2, y: 4},
        {x: 3, y: 9},
        {x: 4, y: 1},
        {x: 5, y: 7},
        {x: 6, y: 6},
        {x: 7, y: 3},
        {x: 8, y: 9},
        {x: 9, y: 11}
    ];

    const dataBluePink = [
        {x: 0, y: 2},
        {x: 1, y: 3},
        {x: 2, y: 8},
        {x: 3, y: 5},
        {x: 4, y: 4},
        {x: 5, y: 3},
        {x: 6, y: 2},
        {x: 7, y: 5},
        {x: 8, y: 3},
        {x: 9, y: 1}
    ];
    return (
        <FlexXYPlot>
            <GradientDefs>
                <linearGradient id="GoldPinkGradient" x1="0" x2="0" y1="0" y2="1">
                    <stop offset="0%" stopColor="#EBA835" stopOpacity={1}/>
                    <stop offset="100%" stopColor="#E323FF" stopOpacity={1} />
                </linearGradient>
            </GradientDefs>
            <GradientDefs>
                <linearGradient id="BluePinkGradient" x1="0" x2="0" y1="0" y2="1">
                    <stop offset="0%" stopColor="#00FFE0" stopOpacity={1}/>
                    <stop offset="100%" stopColor="#FF7BEA" stopOpacity={1} />
                </linearGradient>
            </GradientDefs>
            <LineSeries
                color={'url(#GoldPinkGradient)'}
                data={dataGoldPink}
                curve={'curveMonotoneX'}
                strokeWidth={4}
            />
            <LineSeries
                color={'url(#BluePinkGradient)'}
                data={dataBluePink}
                curve={'curveMonotoneX'}
                strokeWidth={4}
            />
        </FlexXYPlot>
    );
}

export default  HomeHeader
