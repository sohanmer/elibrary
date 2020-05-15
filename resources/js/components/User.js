import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import UserBook from './UserBook.js';

class User extends Component {

    constructor(props){
        super(props);
    }
    render(){
        return (
            <>
               <UserBook books = {this.props.books} 
                readBooks = {this.props.readBooks} 
                bookGenres = {this.props.bookGenres}
                path={this.props.path}
                genres={this.props.genres} /> 
            </>
        );
    }
}

export default User;

if (document.getElementById('user')) {
    var books = document.getElementById('user').getAttribute('books');
    var readBooks = document.getElementById('user').getAttribute('readBooks');
    var bookGenres = document.getElementById('user').getAttribute('bookGenres');
    var path = document.getElementById('user').getAttribute('path');
    var genres = document.getElementById('user').getAttribute('genres')
    ReactDOM.render(<User books={books} 
                        readBooks={readBooks}
                        bookGenres={bookGenres}
                        path={path}
                        genres={genres}/>, document.getElementById('user'));
}
