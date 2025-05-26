<?php
// app/Http/Controllers/CompanyController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Company;

class CompanyController extends Controller
{


 // Di CompanyController
public function index(Request $request)
{
    $query = Company::query();
    
    if ($request->has('search')) {
        $query->where('full_name', 'like', '%'.$request->search.'%');
    }
    
    $companies = $query->with(['supervisors', 'students'])->paginate(10);
    
    return view('companies.index', compact('companies'));
}
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company,
            'supervisors' => $company->supervisors,
            'students' => $company->students
        ]);
    }


    public function create()
{
    return view('companies.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'phone' => 'required|string|max:20'
    ]);

    Company::create($validated);

    return redirect()->route('companies.create')->with('success', 'Perusahaan berhasil ditambahkan.');
}

}