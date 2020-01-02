<!-- Extend Main layout -->
@extends('layouts.app')
@section('content')
<div class="text-gray-700 mb-2">
    <div class="mx-auto w-full mt-4 justify-center align-center lg:flex">
        <div class="w-2/4 bg-white shadow-lg px-8 pt-6 pb-8 mb-4">
            <div>
                <div class="border border-gray-600 rounded">
                    <p class="ml-10 mb-2">Hint:</p>
                    <div class="ml-3 flex w-full mb-8">

                        <!-- Toggle Button -->
                        <label for="demo1" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="demo1" disabled type="checkbox" class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <div class="ml-3 text-red-600 text-lg font-large">
                                Not Permitted
                            </div>
                        </label>
                        <label for="demo1" class="ml-4 flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="demo1" disabled type="checkbox" checked class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <div class="ml-3 text-green-600 text-lg font-large">
                                Permitted
                            </div>
                        </label>
                    </div>
                </div>

                <form class="mt-4" method="post" action="{{route("permissions.update", $permission->id)}}">
                    @method("PUT")
                    @csrf
                    <div class="flex w-full mb-4">

                        <!-- Toggle Button -->
                        <label for="canCreateOpportunity" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="canCreateOpportunity" name="permission[]" value="canCreateOpportunity"
                                    type="checkbox" {{($permission->canCreateOpportunity)?"checked":""}}
                                    class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-600 text-xl font-large">
                                Can add a new Opportunity?
                            </div>
                        </label>

                    </div>
                    <div class="flex w-full mb-4">

                        <!-- Toggle Button -->
                        <label for="canEditOpportunity" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="canEditOpportunity" name="permission[]" value="canEditOpportunity"
                                    type="checkbox" {{($permission->canEditOpportunity)?"checked":""}} class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-600 text-xl font-large">
                                Can Edit/Update any opportunity?
                            </div>
                        </label>

                    </div>
                    <div class="flex w-full mb-4">

                        <!-- Toggle Button -->
                        <label for="canIndexOpportunity" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="canIndexOpportunity" value="canIndexOpportunity" name="permission[]"
                                    {{($permission->canIndexOpportunity)?"checked":""}} type="checkbox"
                                    class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-600 text-xl font-large">
                                Can View all or any opportunity(ies)?
                            </div>
                        </label>

                    </div>
                    <div class="flex w-full mb-4">

                        <!-- Toggle Button -->
                        <label for="canDeleteOpportunity" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="canDeleteOpportunity" name="permission[]" value="canDeleteOpportunity"
                                    {{($permission->canDeleteOpportunity)?"checked":""}} type="checkbox"
                                    class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-600 text-xl font-large">
                                Can Delete/Archive an opportunity?
                            </div>
                        </label>

                    </div>
                    <div class="flex w-full mb-4">

                        <!-- Toggle Button -->
                        <label for="canCreateContact" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="canCreateContact" type="checkbox" name="permission[]"
                                    value="canCreateContact" class="hidden"
                                    {{($permission->canCreateContact)?"checked":""}} />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-600 text-xl font-large">
                                Can Add a New Client Contact?
                            </div>
                        </label>

                    </div>
                    <div class="flex w-full mb-4">

                        <!-- Toggle Button -->
                        <label for="canEditContact" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="canEditContact" {{($permission->canEditContact)?"checked":""}}
                                    value="canEditContact" type="checkbox" name="permission[]" class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-600 text-xl font-large">
                                Can Edit/Update any contact?
                            </div>
                        </label>

                    </div>
                    <div class="flex w-full mb-4">

                        <!-- Toggle Button -->
                        <label for="canIndexContact" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="canIndexContact" type="checkbox" value="canIndexContact" name="permission[]"
                                    {{($permission->canIndexContact)?"checked":""}} class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-600 text-xl font-large">
                                Can View all Contacts?
                            </div>
                        </label>

                    </div>
                    <div class="flex w-full mb-4">

                        <!-- Toggle Button -->
                        <label for="canDeleteContact" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="canDeleteContact" type="checkbox" value="canDeleteContact"
                                    name="permission[]" {{($permission->canDeleteContact)?"checked":""}}
                                    class="hidden" />
                                <!-- line -->
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                            <!-- label -->
                            <div class="ml-3 text-gray-600 text-xl font-large">
                                Can Archive/Delete any contact?
                            </div>
                        </label>

                    </div>
                    <div class="flex w-full mb-4">

                        <button type="submit"
                            class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 mt-4 px-3 py-2 focus:bg-blue-600 text-white no-underline">Update
                            or withdraw Permissions</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    @endsection
