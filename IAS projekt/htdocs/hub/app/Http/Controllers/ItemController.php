<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

class ItemController extends Controller
{
    //
    public function index(){
        $client = new Client();
        $booksResponse = $client->request('GET', 'http://localhost/provider_books/book');
        $ksiazkiResponse = $client->request('GET', 'http://localhost/provider_ksiazki/ksiazka');
        $estoreResponse = $client->request('GET', 'http://localhost/provider_books_estore/books');
        $magazinesResponse = $client->request('GET', 'http://localhost/provider_magazines/magazine');  
        $libraryResponse = $client->request('GET', 'http://localhost/provider_library/library');
        
        $books = json_decode($booksResponse->getBody(), true);
        $ksiazki = json_decode($ksiazkiResponse->getBody(), true);
        $estore = json_decode($estoreResponse->getBody(), true);
        $magazines = json_decode($magazinesResponse->getBody(), true);
        $library = json_decode($libraryResponse->getBody(), true);
        
        $items = array_merge($this->convertBooks($books),
                             $this->convertKsiazki($ksiazki),
                             $this->convertEstore($estore),
                             $this->convertMagazines($magazines),
                             $this->convertLibrary($library));
//        $items = array_merge($this->convertMagazines($magazines));


        $itemsTab = $this->iterItems($items);
        return response()->json($itemsTab);


    }
    public function show($id){
//        $elements = $this->index();
//        var_dump($elements);
////        return response()->json([]);
//        $elements = json_decode($elements->getBody(), true);
//        var_dump($elements);
//        foreach ($elements as $value) {
////            $tmpValue = json_decode($value->getBody(), true);
////            if ($value['id'] == $id) {
////                return $value->getBody();
////            }
//        }
//        $arr = [];
//        return response()->json($arr);
        
        $client = new Client();
        $booksResponse = $client->request('GET', 'http://localhost/provider_books/book');
        $ksiazkiResponse = $client->request('GET', 'http://localhost/provider_ksiazki/ksiazka');
        $estoreResponse = $client->request('GET', 'http://localhost/provider_books_estore/books');
        $magazinesResponse = $client->request('GET', 'http://localhost/provider_magazines/magazine');
        $libraryResponse = $client->request('GET', 'http://localhost/provider_library/library');        
//provider_library
        
        $books = json_decode($booksResponse->getBody(), true);
        $ksiazki = json_decode($ksiazkiResponse->getBody(), true);
        $estore = json_decode($estoreResponse->getBody(), true);
        $magazines = json_decode($magazinesResponse->getBody(), true);
        $library = json_decode($libraryResponse->getBody(), true);
        
        $items = array_merge($this->convertBooks($books),
                             $this->convertKsiazki($ksiazki),
                             $this->convertEstore($estore),
                             $this->convertMagazines($magazines),
                             $this->convertLibrary($library));
//        $items = array_merge($this->convertMagazines($magazines));


        $itemsTab = $this->iterItems($items);   
        
        foreach ($itemsTab as $value )
        {
            if ($value['id'] = $id)
                    return $value;
        }
    }

    private function iterItems($items) {
        $i = 0;
        $result = [];
        foreach ($items as $item) {
            $i++;
            //provider_id
            if (array_key_exists('provider_id', $item))
            { $provider_id = $item['provider_id']; }
            else { $provider_id = null; }
            //title
            if (array_key_exists('title', $item))
            { $title = $item['title']; }
            else { $title = null; }            
            //authors            
            if (array_key_exists('authors', $item))
            { $authors = $item['authors']; }
            else { $authors = null; }
            //description
            if (array_key_exists('description', $item))
            { $description = $item['description']; }
            else { $description = null; } 
            //is_available
            if (array_key_exists('is_available', $item))
            { $is_available = $item['is_available']; }
            else { $is_available = null; } 
            //pages
            if (array_key_exists('pages', $item))
            { $pages = $item['pages']; }
            else { $pages = null; }
            //publisher
            if (array_key_exists('publisher', $item))
            { $publisher = $item['publisher']; }
            else { $publisher = null; }
            //year
            if (array_key_exists('year', $item))
            { $year = $item['year']; }
            else { $year = null; }             
            //price
            if (array_key_exists('price', $item))
            { $price = $item['price']; }
            else { $price = null; } 
            //type
            if (array_key_exists('type', $item))
            { $type = $item['type']; }
            else { $type = null; }             
            $tmp = [
                'id' => $i,
                'provider_id' => $provider_id,
                'title' => $title,
                'authors' => $authors,
                'description' => $description,
                'is_available' => $is_available,
                'pages' => $pages,
                'publisher' => $publisher,
                'year' => $year,
                'price' => $price,
                'type' => $type
            ];
                 
            array_push($result, $tmp);
        }

        return $result;
    }
    private function convertLibrary($books){
        $result = [];
        foreach ($books as $book){
            $item = [
                'provider_id' => $book['id'],
                'title' => $book['title'],
                'authors' => $book['author_1'].", ".$book['author_2'],
                'description' => $book['isbn'],
                'publisher' => $book['publisher'],
                'year' => $book['year'],
                'price' => $book['price'],
                'type' => 'library book'
            ];
            array_push($result, $item);
        }
        return $result;
    }
    
    private function convertBooks($books){
        $result = [];
        foreach ($books as $book){
            $item = [
                'provider_id' => $book['id'],
                'title' => $book['title'],
                'authors' => $book['authors'],
                'description' => $book['description'],
                'is_available' => $book['is_available'],
                'pages' => $book['pages'],
                'publisher' => $book['publisher'],
                'type' => 'book'
            ];
            array_push($result, $item);
        }
        return $result;
    }
    
    private function convertKsiazki($ksiazki){
        $result = [];
        foreach ($ksiazki as $ksiazka){
            $item = [
                'provider_id' => $ksiazka['id'],
                'title' => $ksiazka['tytul'],
                'authors' => $ksiazka['autorzy'],
                'description' => $ksiazka['opis'],
                'is_available' => $ksiazka['jest_dostepne'],
                'pages' => $ksiazka['strony'],
                'publisher' => $ksiazka['wydawca'],
                'type' => 'book'
            ];
            array_push($result, $item);
        }
        return $result;
    }    

    private function convertEstore($estore){
        $result = [];
        foreach ($estore as $book){
            if ($book['pc_in_stock'] == 0) {
                $is_available = 0;
            }    
            else {
                $is_available = 1;
            }    
                
            $item = [
                'provider_id' => $book['id'],
                'title' => $book['title'],
                'authors' => $book['author_name']." ".$book['author_last_name'],
                'description' => $book['category'],
                'is_available' => $is_available,
                'pages' => $book['pages'],
                'type' => 'book'
            ];
            array_push($result, $item);
        }
        return $result;
    }
    private function convertMagazines($magazines){
        $result = [];
        foreach ($magazines as $magazine){
            $item = [
                'provider_id' => $magazine['id'],
                'title' => $magazine['title'],
                'description' => $magazine['number'],
                'is_available' => 1,
                'year' => $magazine['year'],
                'price' => $magazine['price'],
                'type' => 'magazine'
            ];
            array_push($result, $item);
        }
        return $result;
    }

//    private function convertBooks($books){
//        $result = [];
//        foreach ($books as $book){
//            $item = [
//                'provider_item_id' => $book['id'],
//                'tytul' => $book['title'],
//                'autorzy' => $book['authors'],
//                'opis' => $book['description'],
//                'strony' => $book['pages'],
//                'wydawca' => $book['publisher'],
//                'typ' => 'book'
//            ];
//            array_push($result, $item);
//        }
//        return $result;
//    }

}
