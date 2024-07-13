## Github configuration


### Step 1: Clone the Repository
to push our files into Github repository, we first headed into our project dir using 

```
cd /c/xampp/htdocs/advance
```
then we cloned the content of our repo
```
git clone https://github.com/astral-fate/UN-Women-Laravel-Scholarship.git

```
then we copied our local project files to the specific directory in the cloned repository.

```
cp -r /c/xampp/htdocs/advance/* /c/xampp/htdocs/advance/UN-Women-Laravel-Scholarship/Day\ 2/Assignment/
```

then we staged the changes, and pushed the code to the main repository

```
- git add .
- git commit -m "Added assignment for Day 2"
- git push origin main
```
