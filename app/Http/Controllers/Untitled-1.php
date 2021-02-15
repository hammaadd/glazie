foreach ($terms as $key => $term) {
            
            if(!(int)$term){
            $add_term = new Term;
            $add_term->name = $term;
            $add_term->attribute_id = $request->input('attribute');
            $add_term->created_by = $user->id;
            $add_term->save();
            
            }
        }




        foreach()
       {
            $product_attribute = new ProductAttribute;
        $product_attribute->product_id = $product_id;
        $product_attribute->attribute_id = $request->input('attribute');
        $product_attribute->created_by = $user->id;
        $product_attribute->save();
        $attribute_id = $product_attribute->id;
        $terms = $request->input('terms');
        //print_r($terms);
        