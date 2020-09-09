import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class PostForm extends Component {
    constructor() {
        super()

        this.state = {
            post: {
                name: '',
                content: '',
            }
        }

        this.addPost = this.addPost.bind(this)
    }

    addPost(e) {
        e.preventDefault();

        // TODO name, contentを更新

        // 記事作成リクエスト
        axios
        .post('/api/post/add')
        .then(response => {
            this.setState({posts: response.data});
            console.log('記事作成に成功しました');
        })
        .catch(() => {
            console.log('通信に失敗しました');
        });
    }

    render() {
        return (
            <div>
                <form onSubmit={e => this.addPost(e)}>
                    <label>記事名:</label>
                    <input type="text" id="name-form"></input>

                    <button type="submit">作成</button>
                </form>
            </div>
        );
    }
}

if (document.getElementById('post-form')) {
    ReactDOM.render(<PostForm />, document.getElementById('post-form'));
}