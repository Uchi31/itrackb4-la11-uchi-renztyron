## Lab Activity 10

Question:
G1
Which column did you turn into a table, and why that one and not another?
-- I turn category into a table because it comes from a fixed list, repeats across many books, and could later need its own details.
G2
What number did screenshot 6 show, and why exactly that number?
-- The screenshot 6 showed queries:7, which is 1 query for thhe 6 books plus 1 per book for its category.
G3
Your belongsTo method is named in the singular. What would break if you made it plural?
-- Eloquents adds _id to the method name, co category() finds category_id. A plural categories() would look for categories_id, which  doesnt exist, so the pages would break.




