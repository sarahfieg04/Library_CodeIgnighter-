<?php 

namespace App\Controllers; 
use App\Models\BookModel; 
use CodeIgniter\Controller;

class BookController extends Controller
{
    //Display book index 
    public function books_list()
    {
     
        $books = (new BookModel())->findAll();
        return view('books/list', ['books' => $books]); 
    }

    // Create a new book 
    public function create_book()
    {
        return view('books/form' , ['validation'=> \Config\Services::validation()]); 
    }

    // Store books in the index 
    public function store_book()
    {
        //book attributes 
        $validationRules = [ 
            'title'=> 'required',
            'author'=> 'required',
            'genre'=> 'required',     
            'publication_year'=> 'required|numeric|exact_length[4]',    
            'cover_image'=> 'is_image[cover_image]|max_size[cover_image,2048]',
        ]; 
        // validate book rules 
        if(!$this->validate($validationRules))
            {
                return view('books/form', ['validation' => $this->validator]); 
            }
    
        // get cover art for books 
        $model = new BookModel(); 
        $imageName = null; 

        $file = $this->request->getFile('cover_image');
        if($file && $file->isValid() && !$file->hasMoved()) 
            { 
                $imageName = $file->getRandomName();
                $file->move('uploads', $imageName);
            }
    
        //add in new book 
        $model->insert([
            'title' => $this->request->getPost('title'),
            'author'=> $this->request->getPost('author'),
            'genre'=> $this->request->getPost('genre'), 
            'publication_year' => $this->request->getPost('publication_year'),
            'cover_image'=> $imageName

        ]); 
        //success 
        return redirect()->to('books')->with('success','book added');
    }

    //Edit book index 
    public function edit_book($id)
    {
        $book = (new BookModel())->find($id);
        return view('books/form', ['book'=> $book, 'validation'=> \Config\Services::validation()]);
    }

    //Update a book entry 
    public function update_book($id)
    {
        $model = new BookModel();
        $book = $model->find($id);

        $validation = [
            'title'=> 'required', 
            'author' => 'required',
            'genre'=> 'required',      
            'publication_year'=> 'required',
            'cover_image'  => 'is_image[cover_image]|max_size[cover_image,2048]' 
        ]; 

          if(!$this->validate($validation))
            {
                return view('books/form', ['book'=> $book,'validation' => $this->validator]); 
            }

        // save image file for books
        $imageName = $book['cover_image'];  
        $file = $this->request->getFile('cover_image');
      
        if($file && $file->isValid() && !$file->hasMoved()) 
        {   
            $imageName = $file->getRandomName();
            $file->move('uploads', $imageName);
        }
        $model->update($id , 
        [
            'title' => $this->request->getPost('title'),
            'author'=> $this->request->getPost('author'),
            'genre'=> $this->request->getPost('genre'), 
            'publication_year' => $this->request->getPost('publication_year'),
            'cover_image'=> $imageName
        ]); 
        // success
        return redirect()->to('/books')->with('success','book has been updated');
    }  

    // Delete a book entry 
    public function delete_book($id)
    {
        $model = new BookModel();
        $book = $model->find($id);
        if($book && $book['cover_image'] && file_exists('uploads/' . $book['cover_image']))
            {
                unlink('uploads/'. $book['cover_image']);
            }
            $model->delete($id);
            // success
            return redirect()->to('/books')->with('success','book deleted');
    }

}