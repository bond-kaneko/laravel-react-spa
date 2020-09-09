import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Posts extends Component {
    render() {
        return (
            <div>
                <li key={this.props.post.id}>{this.props.post.name}: {this.props.post.content} <button>削除</button></li>
            </div>
        );
    }
}
