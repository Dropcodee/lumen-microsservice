<?php

namespace Database\Seeders;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		Book::create([
			"title" => 'Hansel & Gretel',
			"description" => 'just a sample book on hansel & gretel',
			"author_id" => 2,
			"price" => 300,
		]);

		Book::create([
			"title" => 'Bio of Dropcode',
			"description" => 'just a sample book on the biography of dropcode the pro developer',
			"author_id" => 2,
			"price" => 300,
		]);

		Book::create([
			"title" => 'Javascript for beginners',
			"description" => 'just a sample book on javascript programming language',
			"author_id" => 2,
			"price" => 300,
		]);
	}
}
