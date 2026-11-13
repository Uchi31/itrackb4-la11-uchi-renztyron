## Lab Activity 11

G1
Route model binding needs two things to be true. Name both, and say what happens when only one of them is.
-- Route model binding needs the parameter type-hinted with my model (`Book $book`) and its name to match the route segment (`{book}`). If only one is true, no real record arrives and there is no error, which is why `/books/999` still gave a 404 without any `findOrFail`.

G2
Your Delete link opened the detail page instead of deleting anything. Explain why.
-- My Delete link was only an `<a>` tag, which can only send GET, so `route('books.destroy', $book)` opened `/books/1`, my show route, and nothing was deleted. The destroy route only answers DELETE, which is why I replaced the link with a form using `@method('DELETE')`.

G3
old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?
-- Without the second argument, `old('title')` has no fallback, so my edit form opened with every field empty. With only the second argument, a rejected submit throws away what I typed and brings back the saved values, but using both kept my new Author in the box.






