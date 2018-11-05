<?php
namespace App\Http\Controllers;

use App\Author;
use App\Quotes;
use Illuminate\Http\Request;

/**
* 
*/
class QuoteController extends Controller
{
	
	function getIndex($author = null)
	{

		if(!is_null($author)){
			$authorQuote = Author::where('name', $author)->first();
			if($authorQuote){
				$quotes = $authorQuote->quotes()->orderBy('created_at','desc')->paginate(4);	
			}else{
				return redirect()->route('index')->with(['info' => 'Author doesn\'t exist']);
			}

		}else{

			$quotes = Quotes::orderBy('created_at','desc')->paginate(4);
		}
		
		return view('layouts/quotes',['quotes' => $quotes]);
	}


	function postQuote(Request $request)
	{
		$this->validate($request,[
			'author' => 'required|max:60|alpha',
			'quote' => 'required|max:500'
			]);
		$authorName = ucfirst(strtolower($request['author']));
		$quoteText = $request['quote'];

		$author = Author::where('name', $authorName)->first();


		if(!$author){
			$author = new Author();
			$author->name = $authorName;
			$author->save();
		}

		$quote = new Quotes();
		$quote->quote = $quoteText;
		$author->quotes()->save($quote);

		return redirect()->route('index')->with([
			'success' => 'Quote saved!']);
	}


	function deleteQuote($quote_id){

		$quote = Quotes::find($quote_id);
		$author_deleted = false;



		if(count($quote->author->quotes) === 1){

			$quote->author->delete();
			$author_deleted = true;
		}

		$quote->delete();

		$msg = $author_deleted ? 'Quote and Author deleted' : 'Quote deleted';

		return redirect()->route('index')->with([
			'success' => $msg]);
	}
}