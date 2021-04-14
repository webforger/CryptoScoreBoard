import React, { Component } from 'react'
import Nav from './layout/navbar'


class Login extends Component {

    render() {
        return (
            <div>
                <Nav />
                <div className="container text-center  title">
                    <h1>Login</h1>
                </div>
            </div>
        )
    }

}

export default Login
