import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Posts extends Component {
    render() {
        return (
            <div className="container">
                <ul>
                    <li key={this.props.post.id}>{this.props.post.name}: {this.props.post.content}</li>
                </ul>
            </div>
        );
    }
}
