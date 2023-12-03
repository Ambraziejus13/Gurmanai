<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    // Show all groups
    public function index() {
        return view('groups.index', [
            'groups' => Group::with(['members', 'editor'])->withCount('members')->latest()->paginate(6)
        ]);
    }

    // Show Create Form
    public function create() {
        return view('groups.create', ['users' => User::get()]);
    }

    // Create New Group
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'user_id' => ['required', 'integer']
        ], [
            'name.required' => 'Privalote įvesti grupės pavadinimą',
            'name.min' => 'Grupės pavadinimas turi būti bent :min simbolių ilgio',
            'user_id.required' => 'Privalote pasirinkti receptų redaktorių',
            'user_id.number' => 'Receptų redaktoriaus id turi būti skaičius',
        ]);

        // Create Group
        $group = Group::create($formFields);

        // Add its editor as group memeber
        GroupMember::create([
            'user_id' => $group->user_id, 
            'group_id' => $group->id,
        ]);

        return redirect('/admin/dashboard')->with('message', 'Grupė sėkmingai sukurta');
    }

    public function join(Request $request) {
        $userId = auth()->id();
        $groupId = $request->group_id;

        $existingMembership = GroupMember::where('user_id', $userId)->where('group_id', $groupId)->exists();

        if (!$existingMembership) {
            GroupMember::create([
                'user_id' => $userId, 
                'group_id' => $groupId,
            ]);

            return redirect()->back()->with('message', 'Sėkmingai prisijungėtė prie grupės!');
        }
        else
        {
            return redirect()->back()->with('message', 'Jūs jau esate prisijungę prie šios grupės.');
        }
    }

    public function leave(Request $request) {
        $userId = auth()->id();
        $groupId = $request->group_id;

        if(Group::find($groupId)->user_id == $userId){
            return redirect()->back()->with('message', 'Negalite palikti savo grupės!');
        }

        $existingMembership = GroupMember::where('user_id', $userId)->where('group_id', $groupId)->first();

        if ($existingMembership) {
            $existingMembership->delete();

            return redirect()->back()->with('message', 'Sėkmingai palikote grupę!');
        }
        else
        {
            return redirect()->back()->with('message', 'Jūs nesate prisijungę prie šios grupės.');
        }
    }

    // Manage Listings
    public function manage() {
        return view('groups.manage', ['groups' => auth()->user()->groups()->with(['members'])->withCount('members')->get()]);
    }

    // Show Edit Form
    public function edit(Group $group) {
        // Load the members relationship to get the users
        $group->load('members.user');

        // Access the users through $group->members
        $users = $group->members->pluck('user');

        return view('groups.edit', compact('group', 'users'));
        
    }

    // Update Group Data
    public function update(Request $request, Group $group) {       
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'user_id' => ['required', 'integer']
        ], [
            'name.required' => 'Privalote įvesti grupės pavadinimą',
            'name.min' => 'Grupės pavadinimas turi būti bent :min simbolių ilgio',
            'user_id.required' => 'Privalote pasirikti receptų redaktorių',
            'user_id.number' => 'Receptų redaktoriaus id turi būti skaičius',
        ]);

        $group->update($formFields);

        return redirect('/groups/manage')->with('message', 'Grupė sėkmingai atnaujinta!');
    }

    // Delete Group
    public function destroy(Group $group) {
        $group->delete();

        return redirect('/groups/manage')->with('message', 'Grupė sėkmingai pašalinta!');
    }
}
