## Lab Activity 9

**F1:** (which column is nullable and why that one)
-- publisher is nullable because a book can exist without a known publisher, but not without a title, author, category or year.

**F2:** (which step failed first and what the error said)
-- the first thing that i encountered is the intl error on db:show --counts and the error says that the intl PHP extension is required to use the format method.

**F3:** (why the Blade files still work after the switch)
-- the controller still passes the same variable names such as books, book, category, and year and a model supports the same $book['title'] access.