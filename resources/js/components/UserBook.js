import React, { Component } from 'react';
import Container from 'react-bootstrap/Container';
import styled from 'styled-components';
import Card from "react-bootstrap/Card";
import Button from "react-bootstrap/Button";
import axios from "axios";
import Badge from "react-bootstrap/Badge";
import Pagination from "react-js-pagination";
import Form from "react-bootstrap/Form";
require("bootstrap/scss/bootstrap.scss");

const Styles = styled.div`
.wrapper{
    padding-top:70px;
}
.date{
    padding:10px 0px 0px 1rem;
    color:red;
    font-weight: 900;    
}
.heading-background{
    height:70px;
}
.img{
    padding:10px 20px 0px 20px;
}
.card-content{
    padding:30px 0px 0px 1rem;
    
}
@media screen and (max-width: 420px) {
    h3{
        text-align:center;
    }
  }
`

class UserBook extends Component{
      
    constructor(props){
        super(props);
        this.state = {
            activePage: 15,
            booksPerPage : JSON.parse(this.props.books).slice(0,3)
          };
        //   console.log(this.state.itemsCountPerPage[0].name);
    }
    handlePageChange(pageNumber) {
        console.log(`active page is ${pageNumber}`);
        this.setState({activePage: pageNumber});
        this.setState({booksPerPage:JSON.parse(this.props.books).slice(pageNumber*(this.state.booksPerPage).length, pageNumber*(this.state.booksPerPage).length+3)})
      }
    markUnRead(id){
        axios.delete(`/userBooks/${id}`, {                
        })
        .then(function (response) {

            $('#'+id).removeClass('btn-primary').addClass('btn-success').html("Mark As Read").click(markRead(id));
        })
        .catch(function (error) {
            console.log(error);
        });
    }    
    markRead(id){
        axios.put(`/userBooks/${id}`, {})
        .then(function (response) {
            $('#'+id).toggleClass('btn-primary btn-success').html($('#'+id).text() == 'Mark As Read' ? 'Mark As Unread' : 'Mark As Read');;
            })
        .catch(function (error) {
            console.log(error);
        });
    }
    
    checkButton(bookid){
        if(JSON.parse(this.props.readBooks).filter(readBook=>{
            return bookid == readBook
        }).length > 0){
            return(
            <Button variant="primary" onClick={() => this.markRead(bookid)} id={bookid}>Mark As Unread</Button>
            )
        }
        else{
            return(
                <Button variant="success" onClick={() => this.markRead(bookid)} id={bookid}>Mark As Read</Button>
            )
        }            
        }    
    componentDidMount () {
    }
    render(){
        return(
            <Styles>
                <div class="card-header row" >
                    <div className="col col-md-6 col-12">
                        <div className="col col-md-12 m-auto">
                            <h3 className="font-weight-bolder text-primary">All Books</h3>                                                                    
                        </div>
                    </div>
                    <div className="col col-md-6 col-12 ml-auto">
                            <div className="col-md-12">
                                <Form action="/filter" method="GET" >
                                    <div className="row">
                                        <div class="ml-auto col-md-4">
                                            <Form.Control as="select" name="filter">
                                                <option value="all"> All</option>
                                                {JSON.parse(this.props.genres).map(genre=>{
                                                    return(
                                                        <option value={genre.id}>{genre.name}</option>
                                                    )
                                                })}                                                
                                            </Form.Control>
                                        </div>
                                        <div  className="text-center mr-auto">
                                            <Button type="submit" value="Filter" variant="primary">Filter</Button>
                                        </div>
                                    </div>
                                </Form>
                            </div>
                        </div>
                    </div>                               
                <Container>
                    <div className="row wrapper">                    
                        {this.state.booksPerPage.map((book,key) => {                        
                            var name = (book.name);
                            if(name.length > 20){
                                var displayName= name.slice(0,15)+'...';
                            }
                            else{
                                var displayName = name;
                            }
                            return(
                                <div className="col col-lg-3 col-md-4 col-12 col-sm-6 pb-3" key ={book.id}>                     
                                    <Card border="primary" className="card h-100">
                                        <Card.Img src={`${this.props.path}/${book.thumbnail}`} className="img" />
                                        <Card.Body>
                                            <Card.Title className="card-content mr-auto font-weight-bolder text-primary h4" >
                                                {displayName}
                                            </Card.Title>                            
                                            <Card.Text className="text-secondary pl-3 ">{book.author} <br/>
                                                {JSON.parse(this.props.bookGenres).map(bookGenre => {
                                                    if(bookGenre.books_id == book.id){
                                                            return(                                                        
                                                                <Badge variant="warning">{bookGenre.name}</Badge>                                                        
                                                            )
                                                        }
                                                })}                                            
                                            </Card.Text>
                                        </Card.Body>
                                        <Card.Body>
                                            <div className="text-center">
                                                {this.checkButton(book.id)}                                          
                                            </div>    
                                        </Card.Body>                                                                                   
                                    </Card>                    
                                </div>
                            )
                        })}
                    </div>
                    <div className="row justify-content-center">
                        <Pagination
                        activePage={this.state.activePage}
                        itemsCountPerPage={3}
                        itemClass="page-item"
                        linkClass="page-link"
                        totalItemsCount={JSON.parse(this.props.books).length}
                        pageRangeDisplayed={(JSON.parse(this.props.books).length)/3}
                        onChange={this.handlePageChange.bind(this)}
                        />
                    </div>
                </Container>
            </Styles>
        );
    }
}

export default UserBook;