

## Table of content
- [Update](#Update)
- [Edit](#Edit)
- [Delete](#Delete)
- [Assignment](#Assignment)


## Patch Vs. Put Request

In the context of rest API, the diffrences between Patch and put are:

### Purpose:

- PUT: Used to update an existing resource or create a new one if it doesn't exist (upsert operation).
- PATCH: Used to partially modify an existing resource by updating only specific fields.


### Request Payload:

- PUT: Requires sending the entire resource body in the request, even if only a few fields need to be updated.
 - PATCH: Allows sending only the fields that need to be changed, making it more efficient for partial updates.


### Resource Creation:

* PUT: Can create a new resource if it doesn't exist (when supporting upsert operations).
* PATCH: Typically used only for updating existing resources, not for creation.

### Server Behavior:

* PUT: Replaces the entire existing resource with the new data sent in the request.
* PATCH: Modifies only the specified fields of the existing resource.


### Idempotency:

- Both PUT and PATCH are considered idempotent, meaning multiple identical requests should have the same effect as a single request.


### Use Cases:

- PUT: Best for updating entire resources or when you want to ensure all fields are explicitly set.
- PATCH: Ideal for updating specific fields without affecting the rest of the resource, especially useful for large resources where sending the entire body would be inefficient.


### Error Handling:

* PUT: May return 404 if the resource doesn't exist (when not supporting upsert).
* PATCH: Typically used on existing resources, so 404 errors are less common.
  
## Assignment

- difference between patch and put request
- do as we did in the session but for classes table
- make delete using delete request not get request


![image](https://github.com/user-attachments/assets/e3e74534-2a70-4f80-89a0-9eef48577255)

![image](https://github.com/user-attachments/assets/245b2a77-e2a6-4efc-a144-22d2b8aa3938)


<img width="965" alt="image" src="https://github.com/user-attachments/assets/83fb0905-9934-4155-8f97-baa8b94012c3">
